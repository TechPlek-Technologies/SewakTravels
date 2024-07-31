import { Link } from "react-router-dom";

const ServiceBlocks1 = ({ item,title }) => {
  console.log("item",item);
  return (
    <div>
      <h2 className="cab-h2">{title}</h2>
      <div className="cabService">
        <ul>
          {item?.map((el,index) => {
            return (
              <li className="cab-li1" key={index}>
                <span>{<Link to={el.src}>{el.name}</Link>}</span>
              </li>
            );
          })}
        </ul>
      </div>
    </div>
  );
};

export default ServiceBlocks1;
