import { AddTodoForm } from '../../components/AddTodoForm';
import { TodoItem } from '../../components/TodoItem';

import './index.css';

export const TodoApp = ({ todos }) => {
  return (
    <div className="page-content page-container" id="page-content">
      <div className="padding">
        <div className="row container d-flex justify-content-center">
          <div className="col-md-12">
            <div className="card px-3">
              <div className="card-body">
                <h4 className="card-title">Awesome Todo list</h4>
                <AddTodoForm />
                {todos.map((todo) => (
                  <TodoItem todo={todo} key={todo.id} />
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
