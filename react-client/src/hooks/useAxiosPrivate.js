import { useEffect } from 'react';
import { useAuth } from '../context/AuthContext';

import { authService } from '../services/auth.service';

import { axiosPrivate } from '../utils/axios.';

const useAxiosPrivate = () => {
  const { user, refresh, logout } = useAuth();

  // console.log(user);

  useEffect(() => {
    const requestIntercept = axiosPrivate.interceptors.request.use(
      (config) => {
        if (config.headers['x-access-token']) return config;
        config.headers['x-access-token'] = `Bearer ${user}`;
        return config;
      },
      (error) => Promise.reject(error),
    );

    const responseIntercept = axiosPrivate.interceptors.response.use(
      (response) => response,
      async (error) => {
        if (error?.response?.status !== 401) return Promise.reject(error);

        const prevReq = error?.config;
        if (prevReq?.sent) {
          logout();
          return Promise.reject(error);
        }

        try {
          prevReq.sent = true;
          const { status, token } = await authService.refreshToken();
          // console.log(status, token);
          // if (status === 200) refresh(token);
          prevReq.headers['x-access-token'] = `Bearer ${token}`;
          return axiosPrivate(prevReq);
        } catch (error) {
          logout();
          return Promise.reject(error);
        }
      },
    );

    return () => {
      axiosPrivate.interceptors.request.eject(requestIntercept);
      axiosPrivate.interceptors.response.eject(responseIntercept);
    };
  }, [user, refresh, logout]);

  return axiosPrivate;
};

export default useAxiosPrivate;
