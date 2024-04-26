import { Link } from "react-router-dom";

const CabFrom1 = ({ item }) => {

  return (
    
    <div class="menu-content">
      <div>
        <img
          src={item?.imgSrc}
          class="img-fluid lazyload cab-img"
          alt=""
        />
      </div>
      <div>
        <div>
          <h5 className="h5-style">{item?.title}</h5>
        </div>
        <div className="cab-li">
       {item?.links?.map((el)=>{
        return(
            <span className="cab-span">
            
              <Link to={el.src}>{el.name}, </Link>
           
          </span>
        )
       })}
         
        </div>
      </div>
    </div>
  
  );
};

export default CabFrom1;
