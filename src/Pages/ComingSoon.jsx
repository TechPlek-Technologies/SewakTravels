import { Link } from "react-router-dom";
import { ComingSoonSvg } from "../Data/Svg";
import Img from "../Components/Common/Img";

const ComingSoon= () => {
    return (
      <div className="coming-soon travel">
        <ComingSoonSvg />
        <div className="coming-soon-detail">
          <div className="container">
            <div className="row">
              <div className="offset-lg-4 col-lg-4 offset-md-3 col-md-6">
                <div>
                  <div className="logo">
                    <Link href="/home/cab/modern">
                      <Img src="/assets/images/icon/footer-logo.png" alt="" className="img-fluid " />
                    </Link>
                  </div>
                  <h2>Will be Opening Soon!</h2>
                  <form onSubmit={(event)=>event.preventDefault()} className="theme-form w-100">
                    <label>Enter your email:</label>
                    <input type="text" name="password" id="name" className="form-control" autoFocus={true} />
                    <div className="col-md-12">
                      <div className="actions">
                        <button type="submit" className="btn btn-solid">
                          Notify me
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  export default ComingSoon;