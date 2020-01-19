import Token from "./Token"
import AppStorage from "./AppStorage"

class User {
                    login(data){

                          axios.post('/api/auth/login',data)
                          .then((response)=>this.afterLogin(response.data))
                          .catch((response)=>console.log(response))
                    }
                    afterLogin(res)
                    {
                        console.log(res);
                        console.log(res.user);
                       
                       
                       if(Token.isVaild(res.access_token))
                       {
                           AppStorage.store(res.access_token,res.user)
                       }
                       else{
                           console.log('false');
                       }
                       
                      
                    }

                    hasToken()
                    {
                        const storeToken = AppStorage.getToken();
                        if(storeToken)
                        {
                            return Token.isVaild(storeToken)? true:false;
                        }
                        else return false;
                    }

                    loggedIn()
                    {
                        return this.hasToken()
                    }

                    loggedOut()
                    {
                        AppStorage.clear();
                    }
                    name()
                    {
                        if(this.loggedIn())
                        {
                            return AppStorage.getUser();
                        }
                    }

                    id()
                    {
                        if(this.loggedIn)
                        {
                            const playload = Token.playload(AppStorage.getToken());
                            return playload.sub;
                        }
                    }

                    

                  
           
}
export default User = new User();