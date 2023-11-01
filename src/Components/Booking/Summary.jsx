import Button from "../Common/Button"

function Summary () {
    return (
        <div className="review_box">
            
            <div className="flight_detail">
                <div className="summery_box">
                    <table className="table table-borderless">
                        <tbody>
                            <tr>
                                <td>adults (3 X $2501)</td>
                                <td>$250</td>
                            </tr>
                            <tr>
                                <td>total taxes</td>
                                <td>$25</td>
                            </tr>
                            <tr>
                                <td>Insurance</td>
                                <td>$15</td>
                            </tr>
                            <tr>
                                <td>Convenience fee</td>
                                <td>$18</td>
                            </tr>
                        </tbody>
                    </table>
                    <div className="grand_total">
                        <h5>grand total: <span>$2500</span></h5>
                    </div>
                    
          <Button name="proceed to pay" btnClass="btn btn-solid" />

                </div>
            </div>
        </div>
    )
}

export default Summary