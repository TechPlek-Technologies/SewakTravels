import { useContext, useEffect } from "react";
import { Modal, ModalBody } from "reactstrap";
import { AppContext } from "../../../Context/JourneyContext";

const Popup = ({ selectedValue, travelDistance, car, modal, toggle }) => {
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
                <div>Extra Per KM Charges </div>
                <div>
                  {" "}
                  {selectedValue === "Outstation One-Way"
                    ? car.outstationOneWay
                    : selectedValue === "Outstation One-Way"
                    ? car.outstattionRoundTrip
                    : selectedValue === "Airport Transfer"
                    ? car.Airport
                    : car.rentals2}
                </div>
                <div>Total Distance</div> <div>{travelDistance} KM</div>
                {selectedValue ===
                "Outstation One-Way" ? null : selectedValue ===
                  "Airport Transfer" ? null : (
                  <>
                    <div>Package (Per Day KM) </div>
                    <div>250</div>
                    <div>Number of days</div>{" "}
                    <div>{Math.ceil(travelDistance / 250)}</div>
                    <div>Night time allowance (11:00 PM - 06:00 AM) </div>
                    <div> ₹ 300/night</div>
                    <div>Driver Allowances per Day</div>
                    <div> ₹ 300</div>
                  </>
                )}
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
