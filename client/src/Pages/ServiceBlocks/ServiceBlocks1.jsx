import { Link } from "react-router-dom";

const ServiceBlocks1 = ({ item }) => {
  return (
    <div>
      <h2 className="cab-h2">{item?.title}</h2>
      <div className="cabService">
        <ul>
            {item?.links?.map((el) => {
              return (
                <li className="cab-li1">
                  <span>

                  {<Link to={el.src}>{el.name}</Link>}
                  </span>
                
                </li>
              );
            })}
        </ul>
      </div>
    </div>
  );
};

export default ServiceBlocks1;
