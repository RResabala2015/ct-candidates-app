import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { authService } from '../../services/auth.service';

const INIT_CREDENTIALS = {
  username: '',
  email: '',
  password: '',
  password_confirmation: '',
};

export const SignUpForm = () => {
  const [pending, setPending] = useState(false);
  const [credentials, setCredentials] = useState(INIT_CREDENTIALS);
  const navigate = useNavigate();

  const onChange = ({ target: { name, value } }) => {
    setCredentials({
      ...credentials,
      [name]: value,
    });
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    setPending(true);

    try {
      const { status, data } = await authService.register(credentials);
      setPending(false);

      if (status === 201)
        navigate('/login', {
          state: {
            username: credentials.username,
          },
        });
      else console.warn(status, data);
    } catch (error) {
      console.error(error);
      setPending(false);
    }
  };

  return (
    <div className="right-side">
      <form onSubmit={onSubmit} className="forms">
        <h3 className="mb-2 text-light">Sign Up</h3>
        <div className="form-inputs">
          <input type="text" value={credentials.username} onChange={onChange} placeholder="Username" name="username" />{' '}
          <i className="fa fa-user"></i>
        </div>
        <div className="form-inputs">
          <input type="email" placeholder="Email" value={credentials.email} onChange={onChange} name="email" />{' '}
          <i className="fa fa-envelope"></i>
        </div>
        <div className="form-inputs">
          <input
            id="password"
            name="password"
            value={credentials.password}
            onChange={onChange}
            className="password-input"
            type="password"
            placeholder="Password"
          />
        </div>
        <div className="form-inputs">
          <input
            id="password_confirmation"
            name="password_confirmation"
            value={credentials.password_confirmation}
            onChange={onChange}
            className="password-input"
            type="password"
            placeholder="Password Confirmation"
          />
        </div>
        {/* {error && (
          <div className="alert alert-danger" role="alert">
            {error}
          </div>
        )} */}
        <div className="submit-button">
          <button className="btn btn-primary">
            {pending ? <i className="fa fa-spinner fa-spin"></i> : 'Registrar'}
          </button>
        </div>
        <span className="text-light">
          <small>¿Ya tienes una cuenta?</small>
          <Link to="/login">Iniciar sesión</Link>
        </span>
      </form>
    </div>
  );
};
