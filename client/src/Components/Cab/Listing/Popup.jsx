import { useContext, useEffect } from "react";
import { Modal, ModalBody } from "reactstrap";
import { AppContext } from "../../../Context/JourneyContext";

const Popup = ({
  selectedValue,
  travelDistance,
  car,
  modal,
  toggle,
  travelTime,
}) => {
  const { journeyData, setJourneyData } = useContext(AppContext);
  const includeInPrice = [
    "Theft protection",
    "Driver allowance",
    "Night Allowance",
  ];

  const excludeInPrice = [
    "late return charges",
    "Fuel charges",
    "Cancellation",
    "Parking",
    "toll / state tax",
  ];

  const perDayprice =
    selectedValue === "Outstation One-Way"
      ? car.outstationOneWay
      : selectedValue === "Outstation Round-Trip"
      ? car.outstattionRoundTrip
      : selectedValue === "Airport Transfer"
      ? car.Airport
      : car.rentals2;

  return (
    <Modal
      modalClassName="video-modal"
      centered
      size="lg"
      fade
      isOpen={modal}
      toggle={toggle}
    >
      <ModalBody>
        <button onClick={toggle} type="button" className="btn-close">
          <span>×</span>
        </button>
        <div
          className="popup-container"
          style={{ display: modal ? "block" : "none" }}
        >
          <div className="popup-content">
            <div className="popup-header">
              <div>
                <h5>{car?.name}</h5>

                <p className="popup-description">{car?.cabType}</p>
              </div>
              <div>
                <img src={car?.img} alt="" />
              </div>
            </div>
            <div className="popup-overview">
              <h6>Fare Details</h6>
              <div className="tableStructure">
                <div>Journey Type </div>
                <div>{selectedValue}</div>
                <div>Package (Per Day KM) </div>
                {selectedValue ===
                  "Hourly Rentals" ? <div>40 / 80</div> : (<><div>250</div>
                  <div>Number of days</div> <div>{travelTime}</div>
                  <div>Extra Per KM Charges(above package distance) </div>
                  <div>{perDayprice}</div></>)}
                
                {selectedValue ===
                "Outstation One-Way" ? null : selectedValue ===
                  "Airport Transfer" ? null : selectedValue ===
                  "Hourly Rentals" ? null : (
                  <>
                    <div>Package Distance</div> <div>{travelTime*250} KM</div>
                    <div>Total Distance</div>{" "}
                    <div>{journeyData.travelDistance * 2} KM</div>
                    <div>Number of Nights</div> <div>{travelTime - 1}</div>
                    <div>Night time allowance (11:00 PM - 06:00 AM) </div>
                    <div> ₹ {car.nightCharges * (travelTime - 1)}</div>
                  
                  </>
                )}
                <div>
                  <b>Total Fare</b>
                </div>{" "}
                <div>
                  <b>
                    ₹{" "}
                    {selectedValue ===
                "Outstation One-Way" ? journeyData.travelDistance* perDayprice: selectedValue ===
                  "Airport Transfer" ? journeyData.travelDistance* perDayprice :selectedValue ===
                  "Hourly Rentals" ? null : (
                  <>
                    {travelDistance * perDayprice +
                      car.nightCharges  * (travelTime - 1)}
                  </>
                )}
                  </b>
                </div>
              </div>
              <ul>
                {car?.carFeatures?.map((item, index) => (
                  <ul key={index}>
                    <img src={item.img} className="img-fluid" alt="" />{" "}
                    {item.text}
                  </ul>
                ))}
              </ul>
            </div>
            <div className="details row">
              <div className="col-sm-5">
                <h6>Included in this price:</h6>
                <ul>
                  {includeInPrice.map((item, index) => (
                    <ul key={index}>{item}</ul>
                  ))}
                </ul>
              </div>
              <div className="col-sm-6">
                <h6>Excluded from this price:</h6>
                <ul>
                  {excludeInPrice.map((item, index) => (
                    <ul key={index}>{item}</ul>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </ModalBody>
    </Modal>
  );
};

export default Popup;
