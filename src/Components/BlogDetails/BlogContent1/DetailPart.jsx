
function DetailPart({data}){
    return (
      <div className="detail-part">
        <p>
          {data.desc_one}
        </p>
        <p>
        {data.desc_two}
        </p>
        <p>{data.desc_three}</p>
        <p>{data.desc_four}</p>
      </div>
    );
  };
  
  export default DetailPart;