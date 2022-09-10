import { Navigate, Outlet, useLocation } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

const RequireAuth = () => {
  const { auth } = useAuth();
  const { pathname } = useLocation();

  return auth ? (
    <Outlet />
  ) : (
    <Navigate
      to="/login"
      state={{
        from: pathname,
      }}
    />
  );
};

export default RequireAuth;
