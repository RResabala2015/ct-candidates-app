const USER_KEY = 'user';

export const userPersistor = {
  setUser: (user) => {
    localStorage.setItem(USER_KEY, JSON.stringify(user.access_token));
  },

  user: () => {
    return localStorage.key(USER_KEY) ? JSON.parse(localStorage.getItem(USER_KEY)) : null;
  },

  accessToken: () => {
    return this.user()?.access_token;
  },

  refreshToken: () => {
    return this.user()?.refreshToken;
  },

  removeUser: () => {
    localStorage.removeItem(USER_KEY);
  },
};
