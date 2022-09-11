import React, { useState } from 'react';
import { useFormik } from 'formik';
import { Link, useLocation, useNavigate } from 'react-router-dom';
import { useAuth } from '../../context/AuthContext';
import { useEffect } from 'react';
import { authService } from '../../services/auth.service';

const INIT_CREDENTIALS = {
  email: '',
  password: '',
};

export const SignInForm = () => {
  const [showPassword, setShowPassword] = useState(false);
  const { state } = useLocation();
  const navigate = useNavigate();
  const [pending, setPending] = useState(false);
  const [credentials, setCredentials] = useState(INIT_CREDENTIALS);
  const { login } = useAuth();

  useEffect(() => {
    setCredentials((prevCredentials) => ({
      ...prevCredentials,
      username: state?.username ? state.username : prevCredentials.username,
    }));
  }, [state]);

  const onChange = ({ target }) => {
    let { name, value } = target;

    setCredentials({
      ...credentials,
      [name]: value,
    });
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    setPending(true);

    try {
      const { status, data } = await authService.login(credentials);
      setPending(false);
      if (status === 200) {
        login(data);
        navigate(state?.from ? state.from : '/', {
          replace: true,
        });
      } else console.warn(status, data);
    } catch (error) {
      console.error(error);
      setPending(false);
    }
  };

  return (
    <div className="right-side">
      <form onSubmit={onSubmit} className="forms">
        <h3 className="mb-2 text-light">Sign In</h3>
        {/* <div className="form-inputs">
          <input type="text" placeholder="User name" /> <i className="fa fa-user"></i>
        </div> */}
        <div className="form-inputs">
          <input type="email" placeholder="Email" name="email" value={credentials.email} onChange={onChange} />{' '}
          <i className="fa fa-envelope"></i>
        </div>
        <div className="form-inputs">
          <input
            id="password"
            name="password"
            className="password-input"
            type={showPassword ? 'text' : 'password'}
            placeholder="Password"
            value={credentials.password}
            onChange={onChange}
          />
          {showPassword ? (
            <i className="fa fa-eye-slash" onClick={() => setShowPassword(!showPassword)}></i>
          ) : (
            <i className="fa fa-eye" onClick={() => setShowPassword(!showPassword)}></i>
          )}
        </div>
        {/* {error && (
          <div className="alert alert-danger" role="alert">
            {error}
          </div>
        )} */}
        <div className="submit-button">
          <button className="btn btn-primary">{pending ? <i className="fa fa-spinner fa-spin"></i> : 'Iniciar'}</button>
        </div>
        <span className="text-light">
          <small>
            No tienes una cuenta? <Link to="/register">registrate aqui</Link>
          </small>
        </span>
      </form>
    </div>
  );
};
