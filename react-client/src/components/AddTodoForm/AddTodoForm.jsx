import { useState } from 'react';
import { useDispatch } from 'react-redux';
import { createTodo } from '../../redux/slices/todosSlice';
import jwt_decode from 'jwt-decode';
import toast from 'react-hot-toast';

export const AddTodoForm = () => {
  const dispatch = useDispatch();

  const decode = jwt_decode(localStorage.getItem('user'));

  const [todo, setTodo] = useState({
    user_id: decode.user.id,
    title: '',
    completed: false,
  });

  const handleInputChange = (e) => {
    setTodo({
      ...todo,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!todo.title) return;

    dispatch(createTodo(todo));

    toast.success('Todo creado correctamente', {
      style: {
        borderRadius: '10px',
        background: '#333',
        color: '#fff',
      },
      position: 'top-right',
      iconTheme: {
        primary: '#fff',
        secondary: '#333',
      },
      icon: '👍',
    });
    setTodo({
      user_id: decode.user.id,
      title: '',
      completed: false,
    });
  };

  return (
    <form onSubmit={handleSubmit} className="add-items d-flex">
      <div className="form-group w-100">
        <input
          type="text"
          name="title"
          onKeyPress={(e) => {
            if (e.key === 'Enter') e.preventDefault();
          }}
          onChange={handleInputChange}
          value={todo.title}
          className="form-control todo-list-input"
          placeholder="titulo"
        />
      </div>

      <button type="submit" className="add btn btn-primary">
        Add
      </button>
    </form>
  );
};
