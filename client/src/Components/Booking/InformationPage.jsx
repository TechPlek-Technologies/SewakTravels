
function InformationPage({ type }) {
    return (
      <>
        <div className="review_box">
          <div className="title-top">
            <h5>{"Information"}</h5>
          </div>
          <div className="flight_detail">
            <div className="row">
              <div className="col-md-12">
                <div className="boxes">
                  <h6>{"Cancellation Charges"}</h6>
                  <ul>
                    <li>
                      airline fee : <span>$2012</span>
                    </li>
                    <li>This airline allows cancellation only before 2 hrs from departure time.</li>
                  </ul>
                </div>
                <div className="boxes">
                  <h6>{"Reschedule Charges"}</h6>
                  <ul>
                    <li>
                      airline fee : <span>$2012</span>
                    </li>
                    <li>This airline allows reschedule only before 2 hrs from departure time.</li>
                  </ul>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </>
    );
  };
  
  export default InformationPage;