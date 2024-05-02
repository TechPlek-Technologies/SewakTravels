import { Link } from "react-router-dom";

const TravelInfo = ({
  isValid,
  contactRef,
  emailRef,
  lastNameRef,
  firstNameRef,
  requestRef,
  desiredcar,
  handleButtonClick,
  paymentData
}) => {
  return (
    <div className="col-lg-7">
      <div className="guest-detail">
        <h2>{"Travel Information"}</h2>
        <form onSubmit={(event) => event.preventDefault()}>
          <div className="form-group">
            <div className="row">
              <div className="col first-name">
                <label>{"First Name"}</label>
                <input
                  type="text"
                  id="firstName"
                  className="form-control"
                  placeholder="First name"
                  autoComplete={true}
                  ref={firstNameRef}
                />
                {!isValid && (
                  <div
                    className={isValid ? "isValidFalse" : ""}
                    style={{ color: "red", display: "none" }}
                  >
                    Required field.
                  </div>
                )}
              </div>
              <div className="col">
                <label>{"Last Name"}</label>
                <input
                  type="text"
                  id="lastName"
                  className="form-control"
                  placeholder="Last name"
                  autoComplete={true}
                  ref={lastNameRef}
                />
                {!isValid && (
                  <div
                    className={isValid ? "isValidFalse" : ""}
                    style={{ color: "red", display: "none" }}
                  >
                    Required field.
                  </div>
                )}
              </div>
            </div>
          </div>
          <div className="form-group">
            <label>{"Email Address"}</label>
            <input
              type="email"
              className="form-control"
              id="email"
              placeholder="Enter email"
              autoComplete={true}
              ref={emailRef}
            />
            {!isValid && (
              <div
                className={isValid ? "isValidFalse" : ""}
                style={{ color: "red", display: "none" }}
              >
                Required field.
              </div>
            )}
            <small id="emailHelp" className="form-text text-muted">
              Booking confirmation will be sent to this email ID.
            </small>
          </div>
          <div className="form-group">
            <label>{"Contact Info"}</label>
            <input
              id="mobile"
              type="number"
              className="form-control"
              placeholder="Enter Mobile Number"
              defaultValue={paymentData?.contact}
              ref={contactRef}
              autoComplete={true}
            />
            {!isValid && (
              <div
                className={isValid ? "isValidFalse" : ""}
                style={{ color: "red", display: "none" }}
              >
                Required field.
              </div>
            )}
          </div>
          <div className="form-group">
            <label htmlFor="exampleFormControlTextarea1">
              {"Special Request"}
            </label>
            <textarea
              className="form-control"
              id="exampleFormControlTextarea1"
              rows={3}
              placeholder="e.g.. early check-in, airport transfer"
              ref={requestRef}
            ></textarea>
          </div>
          <div className="form-group">
            <label htmlFor="exampleFormControlTextarea1">
              have a coupon code?
            </label>
            <div className="input-group">
              <input
                type="text"
                className="form-control"
                placeholder="Promo Code"
              />
              <div className="input-group-prepend">
                <span className="input-group-text">{"Apply"}</span>
              </div>
            </div>
          </div>
        </form>
        <div className="submit-btn sbmt1">
          <Link>
            <button
              className="btn btn-solid App-link"
              type="submit"
              onClick={handleButtonClick}
            >
              {"Book Now"}
            </button>
          </Link>
        </div>
      </div>
    </div>
  );
};

export default TravelInfo;
