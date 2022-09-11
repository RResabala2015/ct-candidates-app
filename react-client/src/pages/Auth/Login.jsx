import { SignInForm } from '../../components/SignInForm';
import './index.css';
import funiberLogo from '../../assets/funiber.svg';

export const Login = () => {
  return (
    <div className="section">
      <div className="container rounded-lg">
        <div className="form">
          <div className="left-side">
            <div className="content">
              <img src={funiberLogo} width="300" height={300} />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
              </p>
            </div>
            <div className="social">
              <ul className="social-icons">
                <li>
                  <a href="#">
                    <i className="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i className="fa fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i className="fa fa-linkedin"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i className="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
              <ul className="terms">
                <li>
                  <a href="#">Terms</a>
                </li>
                <li>
                  <span className="dots"></span>
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
