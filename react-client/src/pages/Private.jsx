import React, { useState } from 'react';
import { useEffect } from 'react';

import { useAuth } from '../context/AuthContext';
import { useDispatch, useSelector } from 'react-redux';
// import { useAxiosPrivate } from '../hooks/useAxiosPrivate';

import { TodoApp } from './Home';
import { getTodos } from '../redux/slices/todosSlice';
import { authService } from '../services/auth.service';

const Private = () => {
  const { logout } = useAuth();
  const [loading, setLoading] = useState(true);
  const dispatch = useDispatch();
  const { todos } = useSelector((state) => state.todos);
  // useAxiosPrivate();

  useEffect(() => {
    dispatch(getTodos());

    return () => {
      setLoading(false);
    };
  }, [dispatch]);

  const onLogout = async () => {
    logout();
  };

  // console.log(todos);

  return (
    <div className="container">
      <button onClick={onLogout} className="btn btn-danger">
        Cerrar sesion
      </button>

      {loading ? <h1>Cargando...</h1> : todos.length > 0 ? <TodoApp todos={todos} /> : <h1>No hay tareas</h1>}
    </div>
  );
};

export default Private;
