import { Link } from "react-router-dom";
import CabSearch from "./CabSearch";

function HomeBanner() {
  return (
    <section className="cab-section p-0">
      <div className="container">
        <div className="row">
          <div className="col-xl-5 col-lg-6">
            <div className="cab-content">
              <div>
                <div className="call-section">
                  <div className="call">
                    <i className="fas fa-phone-alt"></i>
                    <h2>800-5-800</h2>
                  </div>
                </div>
                <h2>Great Journey Begins</h2>
                <h3>Upto 25% off on first booking through your app</h3>
                <CabSearch />
                <div className="car-select">
                  <ul>
                    <li className="active">classic</li>
                    <li>suv</li>
                    <li>luxury</li>
                  </ul>
                  <Link to="/cab/listing" className="btn btn-solid">
                    book now
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export default HomeBanner;
