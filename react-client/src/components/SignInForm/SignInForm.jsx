export const SignInForm = () => {
  return (
    <div class="right-side">
      <div class="forms">
        <div class="form-inputs">
          <input type="text" placeholder="User name" /> <i class="fa fa-user"></i>
        </div>
        <div class="form-inputs">
          <input type="email" placeholder="Email" autocomplete="chrome-off" /> <i class="fa fa-envelope"></i>
        </div>
        <div class="form-inputs">
          <input
            id="password_input"
            class="password-input"
            autocomplete="chrome-off"
            type="password"
            placeholder="Password"
          />
          <i class="fa fa-eye" id="password_eye"></i> <p id="random_password" class="random_password"></p>
        </div>
        <ul class="strength-list">
          <li>
            <span class="loweruppercase list-group">
              <i class="fa fa-circle"></i> <span>Lowercase uppercase</span>
            </span>
          </li>
          <li>
            <span class="list-group numbercase">
              <i class="fa fa-circle"></i> <span>Number (0-9)</span>
            </span>
          </li>
          <li>
            <span class="list-group specialcase">
              <i class="fa fa-circle"></i> <span>Special Characters(!#@$%*)</span>
            </span>
          </li>
          <li>
            <span class="list-group numcharacter">
              <i class="fa fa-circle"></i> <span>8 Characters</span>
            </span>
          </li>
        </ul>
        <div class="submit-button">
          <input type="submit" />
        </div>
      </div>
    </div>
  );
};
