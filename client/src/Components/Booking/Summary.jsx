import { Link } from "react-router-dom";
import Img from "../Common/Img";
import { useContext, useEffect } from "react";
import { AppContext } from "../../Context/JourneyContext";

const Summary = ({
  desiredcar,
  handleButtonClick,
  payableAmount,
  setpayableAmount,
  paymentData,
  setDriverAllowance,
  driverAllowance,
  setNight,
  night,
}) => {
  const { journeyData } = useContext(AppContext);

  const pickupDate = new Date(journeyData?.startDate);
  // console.log(typeof(journeyData?.travelDistance))

  const pay = paymentData.totalFare;
  // console.log(pay)

  const dateStringConverter = (pickupDate) => {
    const newpickupDate = new Date(pickupDate);

    // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)

    let dayOfWeek = null;
    if (newpickupDate) {
      dayOfWeek = newpickupDate.getDay();
    }

    // Get the month (0 = January, 1 = February, ..., 11 = December)
    const month = newpickupDate.getMonth();

    // Get the date (day of the month)
    const date = newpickupDate.getDate();

    // Get the year
    const year = newpickupDate.getFullYear();

    // Convert the numerical values to human-readable strings
    const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    const months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    return (
      <h5>
        {daysOfWeek[dayOfWeek]}, {date} {months[month]} {year}
      </h5>
    );
  };

  const updateAmount = (e) => {
    if (e.target.value === "oneThirdPayment") {
      setpayableAmount(Math.ceil((pay * 15) / 100));
    }
    if (e.target.value === "fullPayment") {
      setpayableAmount(pay);
    }
  };

  useEffect(() => {
    const driver =
      journeyData.selectedValue === "Outstation One-Way" ||
      journeyData.selectedValue === "Airport Transfer"
        ? 0
        : paymentData.driverAllowance;

    setDriverAllowance(driver);

    const night =
      journeyData.selectedValue === "Outstation One-Way"
        ? 0
        : journeyData.selectedValue === "Airport Transfer"
        ? 0
        : paymentData.nightCharges;

    setNight(night);
  }, []);

  return (
    <div className="col-lg-5 booking-order">
      <div className="summery-box">
        <h2>{"Booking Summary"}</h2>
        <div className="hotel-section">
          <div className="hotel-img">
            <Img src={desiredcar.img} className="img-fluid" alt="" />
          </div>
          <div className="hotel-detail">
            <h6>{desiredcar.name}</h6>
            <p>{desiredcar.cabType}</p>
          </div>
        </div>
        <div className="summery-section">
          <div className="box">
            <div className="left">
              <div className="up">
                <h6>Pickup Date</h6>
                {dateStringConverter(pickupDate)}
              </div>
              <div className="down">
                <h6>Pickup Time</h6>
                <h5>{journeyData.startTime}</h5>
              </div>
            </div>
            <div className="right">
              <div className="up">
                <h6>Source</h6>
                <h5>{journeyData.source}</h5>
              </div>
              {(journeyData.selectedValue === "Hourly Rentals" && (
                <div className="down">
                  <h6>Package</h6>
                  <h5>{journeyData.rentalPackage}</h5>
                </div>
              )) || (
                <div className="down">
                  <h6>Destination</h6>
                  <h5>{journeyData.destination}</h5>
                </div>
              )}
            </div>
          </div>
        </div>
        <div className="summery-section">
          <h5 className="mb-0">{journeyData.selectedValue}</h5>
          <Link
            to={`/cab/listing/${encodeURIComponent(
              journeyData.source
            )}/${encodeURIComponent(journeyData.destination)}`}
            className="edit-cls"
          >
            {"Edit"}
          </Link>
        </div>
        <div className="summery-section">
          <div className="payment-details">
            <h5>payment details</h5>
            <table>
              <tbody>
                <tr>
                  <td>Base price</td>
                  <td>
                    ₹
                    {journeyData.selectedValue === "Outstation One-Way"
                      ? pay
                      : journeyData.selectedValue === "Airport Transfer"
                      ? pay
                      : pay -
                        paymentData.driverAllowance -
                        paymentData.nightCharges}
                    {}
                  </td>
                </tr>
                <tr>
                  <td>Driver Charges</td>
                  <td>
                    + ₹
                    {driverAllowance}
                  </td>
                </tr>
                <tr>
                  <td>Night Charges</td>
                  <td>
                    + ₹
                    {night}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div className="summery-section">
          <div className="payment-details">
            <table>
              <tbody>
                <tr>
                  <td>
                    <select
                      type="text"
                      className="form-control open-select"
                      id="exampleInputEmail1"
                      placeholder="pick up"
                      onChange={updateAmount}
                    >
                      <option value="oneThirdPayment">
                        Make Part Payment Now
                      </option>
                      <option value="fullPayment">Make Full Payment Now</option>
                    </select>
                  </td>
                  <td className="amount">₹{payableAmount}</td>
                </tr>
                {<tr>Make full payment now, or make part payment and pay the rest to the driver.</tr>}  
              
              </tbody>
            </table>
            {/* <div className="submit-btn sbmt">
              <Link>
                <button
                  className="btn btn-solid App-link"
                  type="submit"
                  onClick={handleButtonClick}
                >
                  {"Book Now"}
                </button>
              </Link>
            </div> */}
          </div>
        </div>
      </div>
    </div>
  );
};

export default Summary;
