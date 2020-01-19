class Token{

    isVaild(token)
    {
        const payload = this.payload(token);


        if(payload)
        {
            return payload.iss=="http://blog1.test/api/auth/login"? true : false;
            //console.log('test');
        }
        else false
    }
    payload(token)
    {
        const payload = token.split('.')[1];
        //console.log(token);
        //console.log(this.decode(payload));
        return this.decode(payload);
    }

    decode(payload)
    {
        return JSON.parse(atob(payload));
    }

}
export default Token = new Token()