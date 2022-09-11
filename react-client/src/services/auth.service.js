import { axiosPrivate, axiosPublic } from '../utils/axios.';

export const authService = {
  refreshToken: () => {
    const token = axiosPrivate.post('/user/refresh');
    return token;
  },

  register: (data) => {
    return axiosPublic.post(
      '/user/register',
      {
        ...data,
      },
      {
        headers: { 'Content-Type': 'application/json' },
        withCredentials: true,
      },
    );
  },

  login: (data) => {
    return axiosPublic.post(
      '/user/login',
      {
        ...data,
      },
      {
        headers: { 'Content-Type': 'application/json' },
        withCredentials: true,
      },
    );
  },
};