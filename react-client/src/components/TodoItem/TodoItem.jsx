import { useEffect } from 'react';
import { useState } from 'react';
import toast from 'react-hot-toast';
import { useDispatch } from 'react-redux';
import { deleteTodo, editTodo } from '../../redux/slices/todosSlice';

export const TodoItem = ({ todo }) => {
  const dispatch = useDispatch();

  const [title, setTitle] = useState();
  const [checked, setChecked] = useState(false);

  useEffect(() => {
    if (todo.completed === false) {
      setChecked(false);
    } else {
      setChecked(true);
    }
  }, [todo.completed]);

  const handleDelete = (id) => {
    dispatch(deleteTodo(id));
    toast.success('Todo eliminado', {
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
      icon: '🗑️',
    });
  };

  const handleEdit = (id, checked) => {
    try {
      const resp = dispatch(
        editTodo({
          id,
          completed: checked ? false : true,
        }),
      );

      toast.success('Todo actualizado correctamente', {
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

      setChecked(!checked);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    setTitle(todo.title);
  }, [todo.title]);

  return (
    <div key={todo.id} className="list-wrapper">
      <ul className="d-flex flex-column-reverse todo-list">
        <li className={checked ? 'completed' : ''}>
          <div className="form-check">
            <label className="form-check-label">
              <input
                className="checkbox"
                type="checkbox"
                checked={checked}
                onChange={() => handleEdit(todo.id, checked)}
                onClick={handleEdit}
              />
              {title} <i className="input-helper"></i>
            </label>
          </div>

          <i className="remove mdi mdi-close-circle-outline" onClick={() => handleDelete(todo.id)}></i>
        </li>
      </ul>
    </div>
  );
};
