import { Link } from "react-router-dom";

const About = () => {
  const scrollToTop = () => {
    window.scrollTo(0, 0);
  };
    return (
      <div className="col-xl-3 col-md-4">
        <div className="footer-space">
          <div className="footer-title">
            <h5>{"About"}</h5>
          </div>
          <div className="footer-content">
            <div className="footer-links">
              <ul>
                <li>
                  <Link onClick={scrollToTop} to={"/about"}>About us</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to={"/FAQ"}>FAQ</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to={"/terms-and-conditions"}>Terms & condition</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to={"/privacy-policy"}>Privacy</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to={"/refund-policy"}>Refund Policy</Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default About;