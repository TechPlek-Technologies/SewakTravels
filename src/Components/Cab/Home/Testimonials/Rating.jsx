const Rating= ({ rang }) => {
    return (
      <div className="rating">
        <i className="fas fa-star"></i>
        <i className="fas fa-star"></i>
        <i className="fas fa-star"></i>
        <i className="fas fa-star"></i>
        <i className="far fa-star"></i>
        {rang && <span>{rang}</span>}
      </div>
    );
  };
  
  export default Rating;