import { SignInForm } from '../../components/SignInForm';
import './index.css';
import funiberLogo from '../../assets/funiber.svg';

export const Login = () => {
  return (
    <div class="section">
      <div class="container">
        <div class="form">
          <div class="left-side">
            <div class="content">
              <img src={funiberLogo} width="300" height={300} />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
              </p>
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
