import { Link } from "react-router-dom";

const Logo= () => {
  
    return (
      <>
      
          <div className="brand-logo">
            <Link to={`/`}>
              <img src={"/assets/img/logo.png"} alt="logo-clasic" className="img-fluid ed" width={140} height={140} />
            </Link>
          </div>
        
      </>
    );
  };
  
  export default Logo;