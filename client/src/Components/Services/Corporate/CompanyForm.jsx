import BackgroundSection from "../../Common/BackgroundSection";
import TitleComponent from "../../Common/TitleComponent";

const CompanyForm = () => {
  return (
    <BackgroundSection
      titleClass="medium-section parallax-img subscribe-section"
      img="/assets/images/hotel/subscribe-bg.jpg"
      imgWidth={1920}
      imgHeight={348}
      position="center"
    >
      <div className="container">
        <TitleComponent
          title={"Company fleets"}
          subTitle={"Manage Your Corporate Travel"}
          titleClass={"title-1"}
          h2Class="text-white"
        />
        <div className="row">
          <div className="offset-xl-3 col-xl-6 col-md-8 offset-md-2 col-10 offset-1">
            <div className="input-group">
              <div className="form-group col-md-6">
                <input
                  type="text"
                  className="form-control"
                  id="name"
                  placeholder="first name"
                  required={true}
                />
              </div>
              <div className="form-group col-md-6">
                <input
                  type="text"
                  className="form-control"
                  id="name"
                  placeholder="last name"
                  required={true}
                />
              </div>
              <div className="form-group col-md-6">
                <input
                  type="text"
                  className="form-control"
                  id="name"
                  placeholder="phone"
                  required={true}
                />
              </div>
              <div className="form-group col-md-6">
                <input
                  type="text"
                  className="form-control"
                  id="name"
                  placeholder="company name"
                  required={true}
                />
              </div>
             
              <div className="form-group col-md-12">
                <input
                  type="text"
                  className="form-control"
                  placeholder="Enter Your company Email Address"
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                />
                 
              </div>
              <div className="col-md-12 submit-btn">
            <button className="btn btn-solid" type="submit">
              Submit
            </button>
          </div>
            </div>
            
          </div>
        </div>
      </div>
    </BackgroundSection>
  );
};

export default CompanyForm;
