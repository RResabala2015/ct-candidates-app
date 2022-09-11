import { Link } from 'react-router-dom';
import './index.css';

export const NotFoundPage = () => {
  return (
    <div className="container">
      <div className="row">
        <div className="col-md-12">
          <h1>
            <i className="fa fa-exclamation-triangle" aria-hidden="true"></i>
            404
          </h1>
          <h2>Oops... Page Not Found!</h2>

          <button type="submit">
            <i className="fa fa-search" aria-hidden="true"></i>
            <Link to="/login">Go to Home</Link>
          </button>

          <p>
            If you think you have arrived here by our mistake, please <a href="#">contact us</a>
          </p>

          <h3>Follow us:</h3>
          <div className="social-networks">
            <a href="https://www.facebook.com/creativedesignthemes/" target="_blank">
              <i className="fab fa-facebook-square"></i>
            </a>
            <a href="https://www.pinterest.com/creative3355/" target="_blank">
              <i className="fab fa-pinterest-square"></i>
            </a>
            <a href="https://twitter.com/creativedesign_" target="_blank">
              <i className="fab fa-twitter-square"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};
