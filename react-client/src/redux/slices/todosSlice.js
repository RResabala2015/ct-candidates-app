import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';
import axios from 'axios';

const baseURL = import.meta.env.VITE_API_URL;

const initialState = {
  todos: [],
  isLoading: false,
};

export const getTodos = createAsyncThunk('todos/getTodos', async () => {
  try {
    const res = await axios({
      method: 'GET',
      url: `${baseURL}/user/todos`,
    });
    return res.data;
  } catch (err) {
    return err.message;
  }
});

export const createTodo = createAsyncThunk('todos/createTodo', async (todo) => {
  try {
    const res = await fetch(`${baseURL}/user/todo/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(todo),
    });
    const data = await res.json();

    return data;
  } catch (err) {
    return err.message;
  }
});

export const editTodo = createAsyncThunk('todos/editTodo', async (data) => {
  const { id, completed } = data;
  try {
    const res = await fetch(`${baseURL}/user/todo/update/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ completed }),
    });
    const data = await res.json();

    console.log(data);
    return data;
  } catch (err) {
    return err.message;
  }
});

export const deleteTodo = createAsyncThunk('todos/deleteTodo', async (id) => {
  try {
    const res = await fetch(`${baseURL}/user/todo/delete/${id}`, {
      method: 'DELETE',
    });
    const data = await res.json();

    return data;
  } catch (err) {
    return err.message;
  }
});

export const todosSlice = createSlice({
  name: 'todos',
  initialState,
  extraReducers: {
    [getTodos.pending]: (state) => {
      state.isLoading = true;
    },
    [getTodos.fulfilled]: (state, action) => {
      state.todos = action.payload;
      state.isLoading = false;
    },
    [getTodos.rejected]: (state) => {
      state.isLoading = false;
    },

    [createTodo.pending]: (state) => {
      state.isLoading = true;
    },
    [createTodo.fulfilled]: (state, action) => {
      state.todos = [action.payload, ...state.todos];
      state.isLoading = false;
    },
    [createTodo.rejected]: (state) => {
      state.isLoading = false;
    },

    [editTodo.pending]: (state) => {
      state.isLoading = true;
    },
    [editTodo.fulfilled]: (state, action) => {
      state.todos = state.todos
        .map((todo) =>
          // loop through each original todos, if the todo id is = to the payload id
          // return the payload (it means it's updated) else just return all original todos
          todo.id === action.payload.id ? action.payload : todo,
        )
        .sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at));

      state.isLoading = false;
    },
    [editTodo.rejected]: (state) => {
      state.isLoading = false;
    },

    [deleteTodo.pending]: (state) => {
      state.isLoading = true;
    },
    [deleteTodo.fulfilled]: (state, action) => {
      state.todos = state.todos.filter((todo) => todo.id !== action.payload.id);
      state.isLoading = false;
    },
    [deleteTodo.rejected]: (state) => {
      state.isLoading = false;
    },
  },
});

export default todosSlice.reducer;
