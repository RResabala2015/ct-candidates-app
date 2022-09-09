import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';

import './App.css';
import { AuthProvider } from './context/AuthContext';
import useAuth from './hooks/useAuth';
import { Login, Register } from './pages/Auth';
import { TodoApp } from './pages/Home';
import { NotFoundPage } from './pages/NotFoundPage';

const Private = ({ Item }) => {
  const { signed } = useAuth();

  return signed > 0 ? <Item /> : <Navigate to="/" replace={true} />;
};

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <div className="App">
          <Routes>
            <Route exact path="/home" element={<Private Item={<TodoApp />} />} />
            <Route index path="/" element={<Login />} />
            <Route exact path="/register" element={<Register />} />
            <Route path="*" element={<NotFoundPage />} />
          </Routes>
        </div>
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;
