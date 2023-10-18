import { Link } from "react-router-dom";

function Logo({logo}){

    return(
        <>
      {logo === "dark" ? (
        <div className="brand-logo">
          <Link to="/">
            <img src="/assets/images/icon/footer-logo.png" alt="" className="img-fluid " width={140} height={140} />
          </Link>
        </div>
      ) : (
        <div className="brand-logo">
          <Link to="/">
            <img src={"/assets/images/icon/footer-logo.png"} alt="logo-clasic" className="img-fluid ed" width={140} height={140} />
          </Link>
        </div>
      )}
    </>
    )
}

export default Logo;