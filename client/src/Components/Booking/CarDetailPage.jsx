import Button from "../Common/Button";
import Img from "../Common/Img";

function CarDetailPage({car, toggleDetails,showDetails }) {
  const includeInPrice = [
    "cancellation",
    "theft protection",
    "local taxes",
    "Prices are inclusive of all the taxes",
    "fuel charges",
    "driver allowance",
  ];

  const excludeInPrice = [
    "late return charges",
    "Night Allowance",
    "Parking",
    "toll / state tax",
  ];

  return (
    <div className="popup-container" style={{ display: showDetails ? 'block' : 'none' }}>
      <div className="popup-content">
        <div className="popup-header">
          <h5>{car?.name}</h5>
          <h6>
            Fare/km: <span>₹{car.fare}</span>
          </h6>
        </div>
        <p className="popup-description">{car?.cabType}</p>
        <div className="popup-overview">
          <h6>Car Overview</h6>
          <ul>
            {car?.carOverview?.map((item, index) => (
              <li key={index}>
                <img src={item.src} className="img-fluid" alt="" /> {item.text}
              </li>
              
            ))}
          </ul>
          <ul>
            {car?.carFeatures?.map((item, index) => (
              <li key={index}>
                <img src={item.src} className="img-fluid" alt="" /> {item.text}
              </li>
            ))}
          </ul>
        </div>
        <div className="details row">
          <div className="col-sm-5">
            <h6>Included in this price:</h6>
            <ul>
              {includeInPrice.map((item, index) => (
                <li key={index}>{item}</li>
              ))}
            </ul>
          </div>
          <div className="col-sm-6">
            <h6>Excluded from this price:</h6>
            <ul>
              {excludeInPrice.map((item, index) => (
                <li key={index}>{item}</li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
}

export default CarDetailPage;
