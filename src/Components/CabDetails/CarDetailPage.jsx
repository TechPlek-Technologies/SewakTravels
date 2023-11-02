import Img from "../Common/Img";

function CarDetailPage({desiredcar}){
    const includeInPrice = ["cancellation", "theft protection", "local taxes", "Prices are inclusive of all the taxes", "fuel charges", "driver allowance"];
  
    const excludeInPrice = ["late return charges", "Night Allowance", "Parking", "toll / state tax"];
  
    return (
      <div className="cab-single-detail">
        <div className="title-car">
          <h5>{desiredcar?.name}</h5>
          <h6>
            fare/km : <span>₹{desiredcar?.fare}</span>
          </h6>
        </div>
        <p className="description">{desiredcar?.cabType}</p>
        <div className="overview">
          <h6>{"Car Overview"}</h6>
          <ul>
            {desiredcar?.carOverview?.map((item, index) => (
              <li key={index}>
                <Img src={item.src} className="img-fluid" alt="" /> {item.text}
              </li>
            ))}
          </ul>
          <ul>
            {desiredcar?.carFeatures?.map((item, index) => (
              <li key={index}>
                <Img src={item.src} className="img-fluid" alt="" /> {item.text}
              </li>
            ))}
          </ul>
        </div>
        <div className="details row">
          <div className="col-sm-6">
            <h6>include in this price:</h6>
            <ul>
              {includeInPrice.map((item, index) => (
                <li key={index}>{item}</li>
              ))}
            </ul>
          </div>
          <div className="col-sm-6">
            <h6>exclude in this price:</h6>
            <ul>
              {excludeInPrice.map((item, index) => (
                <li key={index}>{item}</li>
              ))}
            </ul>
          </div>
        </div>
      </div>
    );
  };
  
  export default CarDetailPage;