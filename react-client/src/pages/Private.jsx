import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import useAxiosPrivate from '../hooks/useAxiosPrivate';
import { TodoApp } from './Home';

const Private = () => {
  const privateAxios = useAxiosPrivate();
  const [content, setContent] = useState('');
  const [loading, setLoading] = useState(true);
  const { logout } = useAuth();

  useEffect(() => {
    const fetchData = async () => {
      try {
        const { data } = await privateAxios.get('/api/test/user');
        setContent(data);
      } catch (error) {
        console.log(error);
      } finally {
        setLoading(false);
      }
    };
    fetchData();
  }, [privateAxios]);

  const onLogout = async () => {
    try {
      await privateAxios.post('/user/logout');
      logout();
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <div className="container">
      <button onClick={onLogout} className="btn btn-danger">
        Cerrar sesion
      </button>
      <h2>{loading ? 'loading ...' : <TodoApp />}</h2>
    </div>
  );
};

export default Private;
