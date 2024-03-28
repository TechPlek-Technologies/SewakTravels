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
                © Copyright 2023 <a href='https://sewaktravels.com/'>SewakTravels</a>. By <a href='https://www.techplek.com/'>TechPlek Technologies</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default CopyRightFooter;