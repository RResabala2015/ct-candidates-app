import React, { useState } from 'react';
import { useEffect } from 'react';

import { useAuth } from '../context/AuthContext';
import { useDispatch, useSelector } from 'react-redux';

import { TodoApp } from './Home';
import { getTodos } from '../redux/slices/todosSlice';

const Private = () => {
  const { logout } = useAuth();

  const dispatch = useDispatch();
  const { todos } = useSelector((state) => state.todos);

  useEffect(() => {
    dispatch(getTodos());
  }, [dispatch]);

  const onLogout = async () => {
    try {
      await privateAxios.post('/user/logout');
      logout();
    } catch (error) {
      console.log(error);
    }
  };

  // console.log(todos);

  return (
    <div className="container">
      <button onClick={onLogout} className="btn btn-danger">
        Cerrar sesion
      </button>
      {todos.length > 0 ? <TodoApp todos={todos} /> : <h2>No hay tareas</h2>}
    </div>
  );
};

export default Private;
