import { Link } from "react-router-dom";
import Img from "../Common/Img";
import { useContext } from "react";
import { AppContext } from "../../Context/JourneyContext";

const Summary = ({ desiredcar }) => {
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
  const hotelData = {
    imageSrc: '/assets/images/hotel/room/1.jpg',
    name: 'sea view hotel',
    location: 'Mina Road, Bur Dubai, Dubai',
  };

  const { journeyData } = useContext(AppContext);

  const pickupDate = new Date(journeyData?.pickupDate);

  
  return (
    <div className="col-lg-5 booking-order">
      <div className="summery-box">
        <h2>{"Booking Summary"}</h2>
        <div className="hotel-section">
          <div className="hotel-img">
            <Img src={hotelData.imageSrc} className="img-fluid" alt="" />
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
                <h5>{journeyData.pickupTime}</h5>
              </div>
            </div>
            <div className="right">
              <div className="up">
                <h6>Source</h6>
                <h5>{journeyData.pickup}</h5>
              </div>
              <div className="down">
                <h6>Destination</h6>
                <h5>{journeyData.dropoff}</h5>
              </div>
            </div>
          </div>
        </div>
        <div className="summery-section">
          <h5 className="mb-0">{journeyData.tripType}</h5>
          <Link to={"/cab/listing/"} className="edit-cls">
            {"Edit"}
          </Link>
        </div>
        <div className="summery-section">
          <div className="payment-details">
            <h5>payment details</h5>
            <table>
              <tbody>
                <tr>
                  <td>base price</td>
                  <td>${desiredcar.fare}</td>
                </tr>
                <tr>
                  <td>promo discount</td>
                  <td>${desiredcar.option}</td>
                </tr>
                <tr>
                  <td>tax & service fees</td>
                  <td>+ ${desiredcar.price}</td>
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
                  <td>payable amount</td>
                  <td className="amount">
                    $
                    {journeyData.distance*desiredcar.fare}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Summary;
