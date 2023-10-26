import SocialMedia from "./SocialMedia";

const CopyRightFooter= () => {
    return (
      <div className="sub-footer">
        <div className="container">
          <div className="row">
            <div className="col-xl-6 col-md-6 col-sm-12">
              <div className="footer-social">
                <SocialMedia />
              </div>
            </div>
            <div className="col-xl-6 col-md-6 col-sm-12">
              <div className="copy-right">
                <p>
                  Copyright 2023 SewakTravels by <i className="fas fa-heart"></i> TechPlek Technologies
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default CopyRightFooter;