import { SignUpForm } from '../../components/SignUpForm';

export const Register = () => {
  return (
    <div class="section">
      <div class="container">
        <div class="form">
          <div class="left-side">
            <div class="content">
              <h5>Bienvenido/a a Funiber</h5>
              <p>
                puerta de acceso al Campus Virtual y a los diversos servicios que ponemos a tu disposición con el fin de
                enriquecer tu experiencia académica.
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
          <SignUpForm />
        </div>
      </div>
    </div>
  );
};
