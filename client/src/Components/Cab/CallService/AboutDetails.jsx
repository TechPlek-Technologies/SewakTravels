import { Link } from "react-router-dom";

const AboutDetails = () => {
    return (
      <div className="about-text">
        <div>
          <h5>
            <span>new</span> offer...
          </h5>
          <h3>call us to Book a taxi</h3>
          <h2>+91-8377-828-828</h2>
          <p>The operator will call back immediately and report the cost of travel.. </p>
          <Link to="contact" className="btn btn-curve btn-lower">
            {"Discover"}
          </Link>
        </div>
      </div>
    );
  };
  
  export default AboutDetails;