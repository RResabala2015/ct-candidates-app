import { BrowserRouter, Route, Routes } from 'react-router-dom';

import './App.css';
import { Login } from './pages/Auth';
import { TodoApp } from './pages/Home';
import { NotFoundPage } from './pages/NotFoundPage';

function App() {
  return (
    <BrowserRouter>
      <div className="App">
        <Routes>
          <Route path="/" element={<Login />} />
          <Route exact path="/home" element={<TodoApp />} />
          <Route path="*" element={<NotFoundPage />} />
        </Routes>
      </div>
    </BrowserRouter>
  );
}

export default App;
