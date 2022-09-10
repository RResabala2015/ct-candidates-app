import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';

import './App.css';
import { AuthProvider } from './context/AuthContext';
import { StorageProvider } from './context/StorageContext';
import RequireAuth from './guards/RequireAuth';

import { Login, Register } from './pages/Auth';
import { TodoApp } from './pages/Home';
import { NotFoundPage } from './pages/NotFoundPage';
import Private from './pages/Private';
import { userPersistor } from './utils/userPersistor';

function App() {
  return (
    <BrowserRouter>
      <StorageProvider storage={userPersistor}>
        <AuthProvider>
          <div className="App">
            <Routes>
              <Route path="/" element={<Navigate to="/private" />} />
              <Route index path="/login" element={<Login />} />
              <Route exact path="/register" element={<Register />} />
              <Route element={<RequireAuth />}>
                <Route path="/private" element={<Private />} />
              </Route>
              <Route path="*" element={<NotFoundPage />} />
            </Routes>
          </div>
        </AuthProvider>
      </StorageProvider>
    </BrowserRouter>
  );
}

export default App;
