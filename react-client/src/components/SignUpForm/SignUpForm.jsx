import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import useAuth from '../../hooks/useAuth';

export const SignUpForm = () => {
  const [email, setEmail] = useState('');
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [passwordConfirm, setPasswordConfirm] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const { signup } = useAuth();

  const handleSignup = () => {
    if (!email | !username | !password) {
      setError('All fields are required');
      return;
    } else if (password !== passwordConfirm) {
      setError('Password do not match');
      return;
    }

    const res = signup(email, password, username);

    if (res) {
      setError(res);
      return;
    }

    alert('Account created successfully');
    navigate('/home');
  };

  return (
    <div class="right-side">
      <div class="forms">
        <h3 className="mb-2 text-light">Sign Up</h3>
        <div class="form-inputs">
          <input
            type="text"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="Username"
            name="username"
          />{' '}
          <i class="fa fa-user"></i>
        </div>
        <div class="form-inputs">
          <input
            type="email"
            placeholder="Email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            name="email"
            autocomplete="chrome-off"
          />{' '}
          <i class="fa fa-envelope"></i>
        </div>
        <div class="form-inputs">
          <input
            id="password"
            name="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            class="password-input"
            autocomplete="chrome-off"
            type="password"
            placeholder="Password"
          />
        </div>
        {error && (
          <div class="alert alert-danger" role="alert">
            {error}
          </div>
        )}
        <div class="submit-button">
          <button class="btn btn-primary" onClick={handleSignup}>
            Sign Up
          </button>
        </div>
      </div>
    </div>
  );
};
