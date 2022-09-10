import { SignUpForm } from '../../components/SignUpForm';

export const Register = () => {
  return (
    <div className="section">
      <div className="container rounded-lg">
        <div className="form">
          <div className="left-side">
            <div className="content">
              <h5>Bienvenido/a a Funiber</h5>
              <p>
                puerta de acceso al Campus Virtual y a los diversos servicios que ponemos a tu disposición con el fin de
                enriquecer tu experiencia académica.
              </p>
              <img src="https://imgur.com/NQesapG.jpg" width="300" />
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
          <SignUpForm />
        </div>
      </div>
    </div>
  );
};
