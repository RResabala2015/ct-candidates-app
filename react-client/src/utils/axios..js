import axios from 'axios';

const BASE_URL = import.meta.env.VITE_API_URL;

export const axiosPublic = axios.create({
  baseURL: BASE_URL,
});

// console.log(localStorage.getItem('user'));

export const axiosPrivate = axios.create({
  baseURL: BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
    Authorization: `Bearer ${JSON.parse(localStorage.getItem('user'))}`,
  },
  withCredentials: true,
});
