import { SignInForm } from '../../components/SignInForm';
import './index.css';

export const Login = () => {
  return (
    <div class="section">
      <div class="container">
        <div class="form">
          <div class="left-side">
            <div class="content">
              <h5>Funiber</h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
              </p>
              <img src="https://imgur.com/NQesapG.jpg" width="300" />
            </div>
            <div class="social">
              <ul class="social-icons">
                <li>
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
              <ul class="terms">
                <li>
                  <a href="#">Terms</a>
                </li>
                <li>
                  <span class="dots"></span>
                </li>
                <li>
                  <a href="#">Services</a>
                </li>
              </ul>
            </div>
          </div>
          <SignInForm />
        </div>
      </div>
    </div>
  );
};
