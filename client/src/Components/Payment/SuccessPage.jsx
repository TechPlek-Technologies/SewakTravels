import { Link } from "react-router-dom";
import Button from "../Common/Button";
import Img from "../Common/Img";


const SuccessPage= ({ title, img,transacionID }) => {
  return (
    <section className="section-b-space success-section">
      <div className="container">
      
        <div className="row success-detail mt-0">
          <div className="col">
            <Img src={img} className="img-fluid" alt="" />
            <h2>{title}</h2>
            <p>thank you for you payment. we have received your payment successfully. your transaction ID is<h3> {transacionID}</h3> you will get an email invoice soon!</p>
            <Link to="/">
            <Button btnClass="btn btn-solid color1" name={"Home"} />
            
            </Link>
          </div>
        </div>
      </div>
    </section>
  );
};

export default SuccessPage;
