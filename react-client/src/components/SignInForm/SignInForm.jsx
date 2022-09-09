import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import useAuth from '../../hooks/useAuth';
import UseAxios from '../../utils/axios.interceptor';

export const SignInForm = () => {
  const { signin } = useAuth();
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [showPassword, setShowPassword] = useState(false);

  const handleLogin = () => {
    if (!email | !password) {
      setError('Preencha todos os campos');
      return;
    }

    const res = signin(email, senha);

    if (res) {
      setError(res);
      return;
    }

    navigate('/home');
  };

  return (
    <div className="right-side">
      <div className="forms">
        <h3 className="mb-2 text-light">Sign In</h3>
        {/* <div className="form-inputs">
          <input type="text" placeholder="User name" /> <i className="fa fa-user"></i>
        </div> */}
        <div className="form-inputs">
          <input
            type="email"
            placeholder="Email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            autocomplete="chrome-off"
          />{' '}
          <i className="fa fa-envelope"></i>
        </div>
        <div className="form-inputs">
          <input
            id="password_input"
            className="password-input"
            autocomplete="chrome-off"
            type={showPassword ? 'text' : 'password'}
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            placeholder="Password"
          />
          {showPassword ? (
            <i className="fa fa-eye-slash" onClick={() => setShowPassword(!showPassword)}></i>
          ) : (
            <i className="fa fa-eye" onClick={() => setShowPassword(!showPassword)}></i>
          )}
        </div>
        {error && (
          <div class="alert alert-danger" role="alert">
            {error}
          </div>
        )}
        <div className="submit-button">
          <button type="submit" onClick={handleLogin} className="btn btn-info">
            Iniciar sesion
          </button>
        </div>
      </div>
    </div>
  );
};
