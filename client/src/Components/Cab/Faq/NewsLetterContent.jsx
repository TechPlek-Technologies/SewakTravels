import { Link } from "react-router-dom";

const NewsLetterContent = ({ titleClass }) => {
    return (
      <div className={titleClass}>
        <div className="newsletter-sec">
          <div>
            <h4 className="title">always first</h4>
            <p>Be the first to find out latest tours and exclusive offers and get 15% off your first booking.</p>
            <form onSubmit={(event)=>event.preventDefault()}>
              <input type="email" id="email1" className="form-control" placeholder="Enter your email" required />
              <div className="button">
                <Link to="#" className="btn btn-solid ">
                  be the first
                </Link>
              </div>
            </form>
          </div>
        </div>
      </div>
    );
  };
  
  export default NewsLetterContent;