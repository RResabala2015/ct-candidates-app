import { useDispatch } from 'react-redux';
import { deleteTodo } from '../../redux/slices/todosSlice';

export const TodoItem = ({ todo }) => {
  const dispatch = useDispatch();

  const handleDelete = (id) => dispatch(deleteTodo(id));

  const [title, setTitle] = useState();

  const handleEdit = (e) => {
    e.preventDefault();

    if (!title) return;

    dispatch(editTodo({ id: todo.id, title, completed: todo.completed }));
    onClose();
  };

  useEffect(() => {
    setBody(todo.body);
    setDuration(todo.duration);
  }, [todo]);

  return (
    <div key={todo.id} className="list-wrapper">
      <ul className="d-flex flex-column-reverse todo-list">
        <li className={todo.completed ? 'completed' : ''}>
          <div className="form-check">
            <label className="form-check-label">
              <input
                className="checkbox"
                type="checkbox"
                checked={todo.completed}
                onChange={() =>
                  updateTodo({
                    ...todo,
                    completed: !todo.completed,
                  })
                }
              />
              {todo.title} <i className="input-helper"></i>
            </label>
          </div>

          <i className="remove mdi mdi-close-circle-outline" onClick={() => handleDelete(todo.id)}></i>
        </li>
      </ul>
    </div>
  );
};
